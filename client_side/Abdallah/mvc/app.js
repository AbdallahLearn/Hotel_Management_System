const express = require("express");
// const db = require("C:/Users/abood/Desktop/WebEng/client_side/Abdallah/mvc/routes/db-config");
const mysql = require("mysql");
const app = express();
const cookie = require("cookie-parser");
const dotenv = require("dotenv").config()
const PORT = 3000


const connection = mysql.createConnection({
    host:"localhost",
    user:"zidn",
    password: "AA1122ss",
    database: "aaam"
})


app.use("/", express.static(__dirname + "./public"))
//there is line here 
app.set("view engine", "ejs");
app.set("views", "./views")
app.use(cookie());
app.use(express.json());

connection.connect((err) =>{
    if(err) throw err;
    console.log("the db is connected")
})


app.listen(PORT, ()=>{
    console.log(`the app is running on port:${PORT}`)
})

