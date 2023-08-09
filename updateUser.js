

function loadUserData(id){
// console.log(id)   // po kliku na řádek tabulky vypíše do konzole, co přijde v id
fetch(`http://localhost/n/getUser.php?id=${id}`)
// .then((user)=>{
//     console.log(user)
//      return user.json()
//     })
.then(user=>user.json())
//.then((user)=>console.log(user))  // výpis do konzole f12
.then(user=>{       // když je jeden parametr, nemusí být v závorce
document.getElementById("username").value = user.login
// ty inputy mají value
// user je převeden na json formát, lze přistupovat k "atributům" přes tečku
document.getElementById("password").value = user.password
document.getElementById("utilization").value = user.utilization
document.getElementById("state").value = user.state

})
}

// toto je formát, jaký má user po převedení na json, jde s ním pracovat v javascriptu - převedení je provedeno v getUser.php
// k jednotlivým "atributům" lze přistupovat přes tečku
// const user = {"id":"1","login":"pavlina","password":"heslo","utilization":"50","state":"ACTIVE"}
// console.log(user.id);



