import '../scss/index.scss';

function main() {
    const navigationRoot = document.querySelector('.navigation');
    if(navigationRoot) {
        import('./modules/navigation').then(module => {
            const Navigation = module.default;
            window.navigation = new Navigation(navigationRoot)
        });
    }
}

document.addEventListener('DOMContentLoaded', () => {
  main();
});