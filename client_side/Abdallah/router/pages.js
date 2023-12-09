const express = require('express');
const router = express.Router();
const path = require('path');
const mysql = require('mysql')

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
    connection.query("SELECT * FROM hotel",(err, result)=>{
        if(err) throw err;
        const {hotel_id , hotel_name, hotel_address, rate} = result
        res.render(path.join(__dirname  ,'..',"views/hotel_makkah"),{hotel_name} )
        
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

