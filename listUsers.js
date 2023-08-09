// console.log("JS je připojen")    // uvidím přes f12 v konzoli
const tb = document.getElementById("table_body")
// console.log(tb)  // uvidím přes f12 v konzoli, není to pěkná reprezentace
let html = ""


fetch("http://localhost/n/listUsers.php").then((data)=>{
    dataJson = data.json()
   console.log(dataJson)
   return dataJson
})
.then((data)=> {
        data.forEach(user => {
            console.log(user, Object.keys(user), Object.values(user))
            html += `<tr onclick="loadUserData(${user.id})">`
            Object.values(user).forEach(prop => html +=`<td>${prop}</td>`)
        html += "</tr>"
        })
    tb.innerHTML = html


    // tb.innerHTML = data.map(user => `<tr>${user.map(prop => `<td>${prop}</td>`).join("")}</tr>`).join("")
    // jde udělat přes funkci map - pokročilejší
})


// toto je formát, jaký má user po převedení na json, jde s ním pracovat v javascriptu - převedení je provedeno v listUsers.php
// k jednotlivým "atributům" lze přistupovat přes tečku
// const user = {"id":"1","login":"pavlina","password":"heslo","utilization":"50","state":"ACTIVE"}
// console.log(user.id);



