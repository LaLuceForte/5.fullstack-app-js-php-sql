
let elems = [];
for (i = 0; i < jArray.length; i++) {
    let a = document.createElement('div');
    a.innerHTML = `${jArray[i]}`;

    a.className = "component"
    a.id = i;
    quantity = i + 1;
    document.getElementById('components').appendChild(a);

}

nullComponent = '';
document.cookie=`profile_viewer_uid=${nullComponent}`;
getInputValue = () => {
   let newComponent =  document.getElementById("newComponent").value;
   
    if (newComponent.length > 0) {
        let a = document.createElement('div');
        a.innerHTML = newComponent;
        a.className = "component";
        document.getElementById('components').appendChild(a);
        document.cookie=`profile_viewer_uid=${newComponent}`;
    }
    else {
        document.cookie=`profile_viewer_uid=${nullComponent}`;
    }

    
}




