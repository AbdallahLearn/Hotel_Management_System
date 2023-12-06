const express = require("express");
const mysql = require("mysql");
const app = express();
const path = require('path');


console.log(path.join(__dirname ,'..' ,"images/hotelBackground.jpeg"))


const PORT = 3000;
//Static Files
app.use(express.static(path.join(__dirname , "public")));
app.use(express.json());
app.use(express.static('../images'))



app.listen(PORT, () => {
    console.log("app is running on " + PORT);
})


app.get('/', (req,res)=>{
    res.sendFile(path.join(__dirname  ,"public/signup.html"))
    // res.sendFile(path.join(__dirname ,'..' ,"images"))
})


const connection = mysql.createConnection({
    host: "localhost",
    user: "abood",
    port:3306,
    password: "AA1122ss",
    database: "aaam"
})

app.post('/create', (req, res) => {
    const {
        first_name,
        last_name,
        email,
        password,
        confirm_password
    } = req.body;

    if(!first_name && !last_name && !email && !password && !confirm_password){
        return res.sendStatus(400);
    }

    // Insert the signup data into the database
    const sql = 'INSERT INTO customer (first_name, last_name, email, password, confirm_password) VALUES (?)';
    connection.query(sql, {
        first_name:body.first_name,
        last_name:body.last_name,
        email:body.email,
        password: body.password,
        confirm_password:body.confirm_password
    }, (err, rows, fields) => {
        if (err) {
            console.error('Error executing MySQL query: ', err);
            res.status(500).json({
                error: 'An error occurred'
            });
            return res.json(rows);
        }

        // Signup successful
        res.status(200).json({
            message: 'Signup successful'
        });
    });
});

connection.connect((err) => {
    if (!err) {
        console.log("DB connection succeded");
    } else {
        console.log("DB connection failed:" + JSON.stringify(err, undefined, 2));
    }
    console.log(connection.state)


})

console.log(path.join(__dirname , "public"))