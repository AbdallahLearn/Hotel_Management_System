const mysql = require("mysql");
const dotenv = require("dotenv").config()
const connection = mysql.createConnection({
    host:process.env.DATABASE_HOST,
    user: process.env.DATABASE_USER,
    password: process.env.DATABASE_PASSWORD,
    database: process.env.DATABASE
})
// const connection = mysql.createConnection({
//     host:localhost,
//     user:zidn,
//     password: AA1122ss,
//     database: customer
// })

module.exports = db;