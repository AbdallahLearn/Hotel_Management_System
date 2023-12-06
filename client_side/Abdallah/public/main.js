function createUser(){
    let userForm = document.getElementById("user-form");
    userForm.onsubmit =(event)=>{
        event.preventDefault();
        let formData = new FormData(userForm);
        let data = {};
        formData.forEach((value, key)=>{
            data[key] = value;
        })
        console.log(data);
        const url = "http://localhost:3000/create";
        fetch(url, {
            method:"POST",
            headers:{
                "Accept": "application/json",
                "Content-Type": "application/json"
            },
            body: JSON.stringify(data)     
        }).then((response)=>{
            console.log(response.status)
            if(response.status ===200){
                alert("Done");
                location.reload();
            }
            else{
                alert("Error");
            }
        })
    }
}
