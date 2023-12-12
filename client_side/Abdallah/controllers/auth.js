
const mysql = require('mysql');
const jwt = require('jsonwebtoken')
const bcrypt = require('bcryptjs')
const path = require('path')


const connection = mysql.createConnection({
    host: "localhost",
    user: "abood",
    port:3306,
    password: "AA1122ss",
    database: "aaam"
})

exports.signup = (req,res) =>{
    
    console.log(req.body);
    const {
        first_name,
        last_name,
        email,
        password,
        confirm_password
    } = req.body;

    connection.query('SELECT email FROM customer WHERE email = ?', [email] , async(err, result)=>{
        if(err) {
            console.log(err);
        }
        if(result.length > 0){
            return res.render(path.join(__dirname, '..', 'views/signup'), {
                message: 'That email is already in use'
            })
        }else if(password !== confirm_password){
            return res.render(path.join(__dirname, '..', 'views/signup') , {
                message: 'password do not match or password less then 8 character'
            });
        }else if(password.length && confirm_password >=8){
            return res.render(path.join(__dirname, '..', 'views/signup') , {
                message: 'password must be more than 7 character'
            });
        }
            
        
        let hashehPassword = await bcrypt.hash(password, 8);
        console.log(hashehPassword)
        
        connection.query("INSERT INTO customer SET ?", {first_name: first_name, last_name:last_name, email:email, password:hashehPassword, confirm_password: hashehPassword}, (err, result)=>{
            if(err){
                console.log(err);
            } else{
                return res.sendFile(path.join(__dirname, '../..', 'Mohammad/main.html') , {
                    message: 'user signup successfully!'
                });
            }
        })
}) 

        
    
}    


