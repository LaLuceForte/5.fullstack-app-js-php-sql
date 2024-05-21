// nullComponent = '';
// document.cookie=`userCookie=${nullComponent}`;


let quantity = 0;
let bool = [];
let elems = [];
for (i = 0; i < components.length; i++) {
    let a = document.createElement('div');
    a.innerHTML = `${components[i]}`;

    a.className = "component"
    a.id = i;
    quantity = i + 1;
    bool.push(false);
    document.getElementById('components').appendChild(a);
}




for (i = 0; i < clients.length; i++) {

        let a = document.createElement('button');
        a.innerHTML = `name = ${clients[i][0]} <br> login = ${clients[i][1]} `;
        a.className = "component"
        document.getElementById('users').appendChild(a);
    
  
}

// for (i = 0; i < jArrayUsers.length; i++) {
//     if (jArrayUsers[i][0] == "seller") {
//         let a = document.createElement('button');
//         a.innerHTML = `login = ${jArrayUsers[i][1]} <br> password = ${jArrayUsers[i][2]} `;
//         a.className = "component"
//         document.getElementById('sellers').appendChild(a);
//     }
  
// }

// for (let i = 0; i < quantity; i++) {
//     document.getElementById(i).onclick = function () {
//         bool[i] = !bool[i];

//         if (bool[i] === true) {
//             elems.push(this.innerHTML)
//             document.querySelector(".custom-components").innerHTML = elems;
//         }
//         else {
//             elems.splice(elems.indexOf(i), 1);
//             document.querySelector(".custom-components").innerHTML = elems;
//         }

//     }

// }

// for (let i = 0; i< quantity; i++) {
//     document.getElementById(i).onclick = () => {
//         // alert(document.getElementById(i).innerHTML)
//         document.cookie=`userCookie=${document.getElementById(i).innerHTML}`;
//     }
// }
