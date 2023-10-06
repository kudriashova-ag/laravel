const clickToCartHandler = async e => { 
  e.preventDefault();
  const elem = e.target;
  const productId = elem.closest('.product-js').dataset.id;
  const result = await axios.post(`/cart/add/${productId}`);
  updateCart(result.data);
}
document.querySelectorAll('.to-cart-js').forEach(btn => btn.addEventListener('click', clickToCartHandler));


import bootstrap from 'bootstrap/dist/js/bootstrap.bundle.js';
const cartModal = new bootstrap.Modal('#cartModal')

const updateCart = (data) => {
  document.querySelector('#cartModal .modal-body').innerHTML = data;
  cartModal.show();
}


const clickRemoveCartHandler = async (e) => { 
  e.preventDefault();
  const elem = e.target;
  if (elem.classList.contains('remove-js')) {
    const productId = elem.closest('tr').dataset.id;
    const result = await axios.delete(`/cart/delete/${productId}`);
    updateCart(result.data);
  }
}

document.querySelector('#cartModal').addEventListener('click', clickRemoveCartHandler);


const changeAmountHandler = async (e)=>{ 
  e.preventDefault();
  const elem = e.target;
  if (elem.classList.contains('amount-js')) { 
    const productId = elem.closest('tr').dataset.id;
    const amount = elem.value;
    if (amount <= 0) { 
      var result = await axios.delete(`/cart/delete/${productId}`);
    }
    else {
      var result = await axios.put('/cart/change-amount', { productId, amount });
    }
    updateCart(result.data);
  }
}

document.querySelector('#cartModal').addEventListener('change', changeAmountHandler);