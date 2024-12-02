/* eslint-disable no-unused-vars */
import React, { useState } from 'react'; // นำเข้า useState ที่นี่
import './Home.css';
import Header from '../../components/Header/Header';
import ExploreMenu from '../../components/ExploreMenu/ExploreMenu';
import FoodDisplay from '../../components/FoodDisplay/FoodDisplay';
import AppDownload from '../../components/AppDownload/AppDownload';

const Home = () => {

  const [category,setCategory] = useState("All"); // ใช้ camel case สำหรับ setCategory
  
  return (
    <div>
      <Header/>
      <ExploreMenu category={category} setCategory={setCategory}/> 
      <FoodDisplay  category={category}/>
      <AppDownload/>
    </div>
  );
}

export default Home;
