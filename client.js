
let quantity = 0;

let bool = [];
let elems = [];
for (i = 0; i < jArray.length; i++) {
    let a = document.createElement('button');
    a.innerHTML = `${jArray[i]}`;
    a.className = "component"
    a.id = i;
    quantity = i + 1;
    bool.push(false);
    document.getElementById('components').appendChild(a);
   
}


for (let i = 0; i < quantity; i++) {
    document.getElementById(i).onclick = function () {
        bool[i] = !bool[i];
        if (bool[i] === true) {
            elems.push(this.innerHTML);
            document.querySelector(".custom-components").innerHTML = elems;
        }
        else {
            if (i !== -1){
                elems.splice(elems.indexOf(this.innerHTML),1)
            }
            document.querySelector(".custom-components").innerHTML = elems;
        }

       

    }

}
nullComponent = '';
document.cookie=`profile_viewer_uid=${nullComponent}`;

document.querySelector('.order-button').onclick = () => {
    
   document.cookie=`profile_viewer_uid=${elems}`;
}


