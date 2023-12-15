const express = require("express");
const router = express.Router();
const path = require("path");
const mysql = require("mysql");

const app = express();
app.set("view engine", "hbs");

const connection = mysql.createConnection({
    host: "localhost",
    user: "abood",
    port: 3306,
    password: "AA1122ss",
    database: "aaam",
});

router.get("/about", (req, res) => {
    res.sendFile(path.join(__dirname, "..", "views/about.html"));
});


router.get("/signup", (req, res) => {
    res.render(path.join(__dirname, "..", "views/signup"));
});
router.get("/home", (req, res) => {
    res.sendFile(path.join(__dirname, "../..", "Mohammad/main.html"));
});
router.get("/booking", (req, res) => {
    res.sendFile(path.join(__dirname, "../..", "Abdalaziz/booking.html"));
});

router.get("/hotel_makkah", (req, res) => {
    let hotel_info = {};
    let room_info = {};
    let city_info = {};

    connection.query("SELECT * FROM hotel", (err, hotelResult) => {
        if (err) throw err;
        hotel_info = {
            hotel_name: hotelResult[0].hotel_name,
            hotel_address: hotelResult[0].hotel_address,
            hotel_rate: hotelResult[0].rate,
            hotel_name1: hotelResult[1].hotel_name,
            hotel_address1: hotelResult[1].hotel_address,
            hotel_rate1: hotelResult[1].rate,
            hotel_name2: hotelResult[2].hotel_name,
            hotel_address2: hotelResult[2].hotel_address,
            hotel_rate2: hotelResult[2].rate,
            hotel_name3: hotelResult[3].hotel_name,
            hotel_address3: hotelResult[3].hotel_address,
            hotel_rate3: hotelResult[3].rate,
            hotel_name4: hotelResult[4].hotel_name,
            hotel_address4: hotelResult[4].hotel_address,
            hotel_rate4: hotelResult[4].rate,
            hotel_name5: hotelResult[5].hotel_name,
            hotel_address5: hotelResult[5].hotel_address,
            hotel_rate5: hotelResult[5].rate
        };

        connection.query("SELECT * FROM room", (err, roomResult) => {
            if (err) throw err;
            room_info = {
                category: roomResult[0].category,
                room_price: roomResult[0].price,
                category1: roomResult[1].category,
                room_price1: roomResult[1].price,
            };

            connection.query("SELECT * FROM city", (err, cityResult) => {
                if (err) throw err;
                city_info = {
                    city_name_med: cityResult[0].city_name,
                    city_name_makkah: cityResult[1].city_name,
                };

                const data = {
                    hotel_info,
                    room_info,
                    city_info
                };
                res.render(path.join(__dirname, "..", "views/hotel_makkah"), data);
                console.log(data);
            });
        });
    });
});

router.get("/hotel_med", (req, res) => {
    let hotel_info = {};
    let room_info = {};
    let city_info = {};

    connection.query("SELECT * FROM hotel", (err, hotelResult) => {
        if (err) throw err;
        hotel_info = {
            hotel_name: hotelResult[0].hotel_name,
            hotel_address: hotelResult[0].hotel_address,
            hotel_rate: hotelResult[0].rate,
            hotel_name1: hotelResult[1].hotel_name,
            hotel_address1: hotelResult[1].hotel_address,
            hotel_rate1: hotelResult[1].rate,
            hotel_name2: hotelResult[2].hotel_name,
            hotel_address2: hotelResult[2].hotel_address,
            hotel_rate2: hotelResult[2].rate,
            hotel_name3: hotelResult[3].hotel_name,
            hotel_address3: hotelResult[3].hotel_address,
            hotel_rate3: hotelResult[3].rate,
            hotel_name4: hotelResult[4].hotel_name,
            hotel_address4: hotelResult[4].hotel_address,
            hotel_rate4: hotelResult[4].rate,
            hotel_name5: hotelResult[5].hotel_name,
            hotel_address5: hotelResult[5].hotel_address,
            hotel_rate5: hotelResult[5].rate,
        };

        connection.query("SELECT * FROM room", (err, roomResult) => {
            if (err) throw err;
            room_info = {
                category: roomResult[0].category,
                room_price: roomResult[0].price,
                category1: roomResult[1].category,
                room_price1: roomResult[1].price,
            };

            connection.query("SELECT * FROM city", (err, cityResult) => {
                if (err) throw err;
                city_info = {
                    city_name_med: cityResult[0].city_name,
                    city_name_makkah: cityResult[1].city_name,
                };

                const data = {
                    hotel_info,
                    room_info,
                    city_info
                };
                res.render(path.join(__dirname, "..", "views/hotel_makkah"), data);
                console.log(data);
            });
        });
    });
});
router.get("/login", (req, res) => {
    res.sendFile(path.join(__dirname, "../..", "Abdalaziz/login.html"));
});
router.get("/images", (req, res) => {
    res.sendFile(path.join(__dirname, "../..", "images"));
});

module.exports = router;