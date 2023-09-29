const clickToCartHandler = async e => { 
  e.preventDefault();
  const elem = e.target;
  const productId = elem.closest('.product-js').dataset.id;

  const result = await axios.post(`/cart/add/${productId}`);
  document.querySelector('#cartModal .modal-body').innerHTML= result.data;
}


document.querySelectorAll('.to-cart-js').forEach(btn => btn.addEventListener('click', clickToCartHandler));