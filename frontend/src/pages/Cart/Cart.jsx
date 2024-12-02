/* eslint-disable no-unused-vars */
import React, { useContext } from 'react';
import './Cart.css';
import { StoreContext } from '../../context/StoreContext';

const Cart = () => {
  const { cartItems, food_list, removeFromCart } = useContext(StoreContext);

  // คำนวณยอดรวมของสินค้าในตะกร้า
  const subtotal = food_list.reduce(
    (acc, item) => acc + (cartItems[item._id] || 0) * item.price,
    0
  );
  const deliveryFee = 2; // ค่าจัดส่งคงที่
  const total = subtotal + deliveryFee;

  return (
    <div className='cart'>
      <div className="cart-items">
        <div className="cart-items-title">
          <p>Items</p>
          <p>Title</p>
          <p>Price</p>
          <p>Quantity</p>
          <p>Total</p>
          <p>Remove</p>
        </div>
        <br />
        <hr />
        {food_list.map((item) => {
          if (cartItems[item._id] > 0) {
            return (
              <div className='cart-items-title cart-items-item' key={item._id}>
                <img src={item.image} alt={item.name} />
                <p>{item.name}</p>
                <p>฿{item.price}</p>
                <p>{cartItems[item._id]}</p>
                <p>฿{item.price * cartItems[item._id]}</p>
                <p onClick={() => removeFromCart(item._id)} className='cross'>X</p>
                <hr />
              </div>
            );
          }
          return null;
        })}

        {/* Cart Totals Section */}
        <div className="cart-bottom">
          <div className="cart-total">
            <h2>Cart Totals</h2>
            <div>
              <div className="cart-total-details">
                <p>Subtotal</p>
                <p>฿{subtotal.toFixed(2)}</p>
              </div>
              <hr />
              <div className="cart-total-details">
                <p>Delivery Fee</p>
                <p>฿{deliveryFee.toFixed(2)}</p>
              </div>
              <hr />
              <div className="cart-total-details">
                <b>Total</b>
                <b>฿{total.toFixed(2)}</b>
              </div>
              <button>Proceed to checkout</button>
            </div>
          </div>

          {/* Promo Code Section */}
          <div className="cart-promocode">
            <p>If you have a promo code, enter it here</p>
            <div className='cart-promocode-input'>
              <input type="text" placeholder='Promo code' />
              <button>Submit</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default Cart;
