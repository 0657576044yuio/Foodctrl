// // eslint-disable-next-line no-unused-vars
// import React, { useContext } from 'react'
// import './FoodDisplay.css'
// import { StoreContext } from '../../context/StoreContext'
// import FoodItem from '../FoodItem/FoodItem'

// // eslint-disable-next-line react/prop-types
// const FoodDisplay = ({category}) => {

//        const {food_list} = useContext(StoreContext)

//   return (
//     <div className='food-display' id='food-display'>
//        <h2>Top dishes near you</h2>
//        <div className="food-display-list">
//          {food_list.map((item,index)=>{
//           {console.log(category,item.category);}
//             if (category==="All" || category===item.category) {
//               return <FoodItem key={index} id={item._id} name={item.name} description={item.description} price={item.price} image={item.image}/>
//             }        
//          })}
//        </div>
//     </div>
//   )
// }

// export default FoodDisplay


// import React, { useState, useEffect } from 'react';
// import './FoodDisplay.css';
// import FoodItem from '../FoodItem/FoodItem';

// import PropTypes from 'prop-types';

// const FoodDisplay = ({ category }) => {
//   const [images, setImages] = useState([]);
//   const [foodList, setFoodList] = useState([]);

//   // Fetch data from the backend
//   useEffect(() => {
//     const fetchFoods = async () => {
//       try {
//         const response = await fetch("http://localhost:3001/api/foods"); // ปรับ URL ตามที่ตั้งไว้ใน backend
//         const data = await response.json();
//         setFoodList(data);
//         setImages(data.map(item => item.image_url)); // สมมติว่าฐานข้อมูลมี image2
//       } catch (error) {
//         console.error("Error fetching food list:", error);
//       }
//     };

//     fetchFoods();
//   }, []);

//   return (
//     <div className="food-display-list">
//       {foodList.map((item, index) => {
//         if (category === "All" || category === item.category) {
//           return (
//             <div key={index} className="food-item-wrapper">
//               <FoodItem
//                 id={item.id}
//                 name={item.name}
//                 description={item.description}
//                 price={item.price}
//                 image={`http://localhost:3001/assets/foodimage/${item.image}`} // ใช้ URL ที่ตรงกับ backend
//               />
//               {images[index] && (
//                   <img
//                     className="additional-image"
//                     src={`http://localhost:3001/assets/foodimage/${images[index]}`}
//                     alt={item.name}
//                   />
//                 )}
//             </div>
//           );
//         }
//         return null;
//       })}
//     </div>
//   );
  
// };

// FoodDisplay.propTypes = {
//   category: PropTypes.string.isRequired, // category ต้องเป็น string และจำเป็นต้องส่งค่าเข้ามา
// };


// export default FoodDisplay;

import PropTypes from 'prop-types';
// eslint-disable-next-line no-unused-vars
import React, { useState, useEffect } from 'react';
import './FoodDisplay.css';
import FoodItem from '../FoodItem/FoodItem';

const FoodDisplay = ({ category }) => {
  const [foodList, setFoodList] = useState([]);
  
  // Fetch data from the backend
  useEffect(() => {
    const fetchFoods = async () => {
      try {
        const response = await fetch("http://localhost:3001/api/foods"); // ปรับ URL ตามที่ตั้งไว้ใน backend
        const data = await response.json();
        setFoodList(data);
      } catch (error) {
        console.error("Error fetching food list:", error);
      }
    };

    fetchFoods();
  }, []);

  return (
    <div className="food-display-list">
      {foodList.map((item) => {
        if (category === "All" || category === item.category) {
          return (
            <div key={item.id} className="food-item-wrapper">
              <FoodItem
                id={item.id}
                name={item.name}
                description={item.description}
                price={item.price}
                image={`http://localhost:3001/assets/foodimage/${item.image_url}`} // รูปภาพหลัก
                //additionalImage={`http://localhost:3001/assets/foodimage/${item.additionalImage}`} // รูปภาพเพิ่มเติม
              />
            </div>
          );
        }
        return null;
      })}
    </div>
  );
};

FoodDisplay.propTypes = {
  category: PropTypes.string.isRequired, // category ต้องเป็น string และจำเป็นต้องส่งค่าเข้ามา
};

export default FoodDisplay;
