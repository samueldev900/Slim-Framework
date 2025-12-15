document.addEventListener('DOMContentLoaded', async () => {
  const page = document.body.dataset.page;
  console.log(page) // nao esta capturando a page retorna undefined
  if (!page) return;


  const map = {
    'products-index': () => import('./pages/products-index.js'),
    'products-create': () => import('./pages/products-create.js'),
  };

  if (map[page]) {
    try {
      await map[page]();
    } catch (e) {
      console.error('Falha ao carregar script da página:', page, e);
    }
  }
});
