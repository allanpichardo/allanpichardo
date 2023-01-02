import * as vertexShader from '../../shaders/vertex.glsl';
import * as fragmentShader from '../../shaders/fragment.glsl';
import * as THREE from 'three';

export default class Background {
    constructor(root) {
        this.root = root;

        this.camera = this.createCamera();
        this.meshGroup = this.createMesh();
        this.scene = this.createScene();
        this.renderer = this.createRenderer();

        this.init();
    }

    init() {
        this.root.appendChild(this.renderer.domElement);
        window.addEventListener('mousemove', (e) => {this.handleMouseMove(e)});
        window.addEventListener('scroll', () => {this.handleScroll()});
        window.addEventListener('resize', () => {this.handleResize()});
        document.body.addEventListener('navigation-toggle', (e) => {this.handleNavToggle(e)});

        this.renderer.setAnimationLoop(() => {
            this.update();
            this.render();
        });
    }

    render() {
        this.renderer.render(this.scene, this.camera);
    }

    createCamera() {
        const fov = 25;
        const {innerWidth, innerHeight} = window;
        const aspect = innerWidth / innerHeight;
        const near = 0.1;
        const far = 1000;

        const camera = new THREE.PerspectiveCamera(fov, aspect, near, far);
        camera.position.set(0, 0, 5);

        return camera;
    }

    createMaterial(wireframe = false) {
        return new THREE.ShaderMaterial({
            vertexShader: vertexShader.default,
            fragmentShader: fragmentShader.default,
            uniforms: {
                mouseX: {
                    type: 'float',
                    value: 0,
                },
                mouseY: {
                    type: 'float',
                    value: 0,
                },
                scale: {
                    type: 'float',
                    value: (window.scrollY / window.innerHeight),
                }
            },
            wireframe: wireframe,
            wireframeLinewidth: 2
        });
    }

    createGeometry() {
        return new THREE.IcosahedronBufferGeometry(1, 8);
    }

    createMesh() {
        const geometry = this.createGeometry();
        const material = this.createMaterial(true);

        const mesh = new THREE.Mesh(geometry, material);
        const group = new THREE.Group();
        group.add(mesh);

        return group;
    }

    createLight() {
        const light = new THREE.DirectionalLight(0xffffff, 1);
        light.position.set(10, 10, 10);

        return light;
    }

    createScene() {
        const scene = new THREE.Scene();
        const light = this.createLight();

        scene.add(this.meshGroup);
        scene.add(light);

        return scene;
    }

    createRenderer() {
        const renderer = new THREE.WebGLRenderer({
            antialias: true,
            alpha: true,
        });

        renderer.setSize(window.innerWidth, window.innerHeight);
        renderer.setPixelRatio(window.devicePixelRatio);
        renderer.gammaFactor = 2.2;
        renderer.gammaOutput = true;
        renderer.physicallyCorrectLights = true;

        return renderer;
    }

    update() {
        this.meshGroup.rotation.x += 0.001;
        this.meshGroup.rotation.y += 0.001;
        this.meshGroup.rotation.z += 0.001;
    }

    handleMouseMove(e) {
        const {clientX, clientY} = e;
        const {innerWidth, innerHeight} = window;

        const mouseX = 0.5 * (clientX / innerWidth) * 2 - 1;
        const mouseY = 0.5 * (clientY / innerHeight) * 2 - 1;

        this.scene.children[0].children[0].material.uniforms.mouseX.value = mouseX;
        this.scene.children[0].children[0].material.uniforms.mouseY.value = mouseY;
    }

    handleResize() {
        const {innerWidth, innerHeight} = window;
        this.camera.aspect = innerWidth / innerHeight;
        this.camera.updateProjectionMatrix();
        this.renderer.setSize(innerWidth, innerHeight);
    }

    handleScroll() {
        const {scrollY} = window;
        this.scene.children[0].children[0].material.uniforms.scale.value = (scrollY / window.innerHeight);
    }

    handleNavToggle(e) {
        this.root.style.zIndex = e.detail.isOpen ? 0 : -1;
        this.scene.children[0].children[0].material.wireframe = !e.detail.isOpen;
    }
}