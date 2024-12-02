// eslint-disable-next-line no-unused-vars
import React from 'react'
import './Footer.css'
import { assets } from '../../assets/assets'

const Footer = () => {
  return (
    <div className='footer' id='footer'>
       <div className="footer-content">
           <div className="footer-content-left">
              <img src={assets.logo} alt="" />
              <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Similique quasi nostrum aut tenetur dolorem veritatis cum deleniti? Neque, quam. Nihil et eaque facilis consectetur cum quia libero, ipsam placeat quae?</p>
              <div className="footer-social-icons">
                     <img src={assets.facebook_icon} alt="" />
                     <img src={assets.twitter_icon} alt="" />
                     <img src={assets.linkedin_icon} alt="" />
              </div>
           </div>
           <div className="footer-content-center">
               <h2>COMPANY</h2>
               <ul>
                     <li>Home</li>
                     <li>About us</li>
                     <li>Delivery</li>
                     <li>Privacy policy</li>
               </ul>
           </div>
           <div className="footer-content-right">
                <h2>GET IN TOUCH</h2>
                <ul>
                     <li>+1-212-456-7890</li>
                     <li>cafe107@gmail.com</li>
                </ul>
           </div>
       </div>
       <hr />
       <p className="footer-copyright">Copyright 2024 @ Tomato.com - All Right Reserved</p>
    </div>
  )
}

export default Footer