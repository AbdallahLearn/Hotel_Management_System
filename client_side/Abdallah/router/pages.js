const express = require('express');
const router = express.Router();
const path = require('path');
const mysql = require('mysql')

const app = express();
app.set('view engine', 'hbs');

const connection = mysql.createConnection({
    host: "localhost",
    user: "abood",
    port:3306,
    password: "AA1122ss",
    database: "aaam"
})


router.get('/signup', (req,res)=>{
    res.render(path.join(__dirname  ,'..',"views/signup"))
})
router.get('/city', (req,res)=>{
    res.sendFile(path.join(__dirname  ,'../..',"Mohammad/main.html"))
})

router.get('/hotel_makkah', (req,res)=>{
    //here bring hotel info from database to display it on browser
    connection.query("SELECT * FROM hotel",(err, result)=>{
        if(err) throw err;
        let hotel_info = {
            hotel_name:result[0].hotel_name,
            hotel_address: result[0].hotel_address,
            hotel_rate:result[0].rate
        }
        res.render(path.join(__dirname  ,'..',"views/hotel_makkah"),{hotel_info})
        console.log(hotel_info)
    })
    //here bring room info to display it on browser
    connection.query("SELECT * FROM room",(err, result)=>{
        if(err) throw err;
        let room_info = {
            category:result[0].category,
            room_price: result[0].price
        }
        res.render(path.join(__dirname  ,'..',"views/hotel_makkah"),{room_info})
        console.log(room_info)
    })


})

router.get('/hotel_med', (req,res)=>{
    res.render(path.join(__dirname  ,'..',"views/hotel_med"))
})
router.get('/login', (req,res)=>{
    res.sendFile(path.join(__dirname  ,'../..',"Abdalaziz/login.html"))
})
router.get('/images', (req,res)=>{
    res.sendFile(path.join(__dirname  ,'../..',"images"))
})

module.exports = router;

