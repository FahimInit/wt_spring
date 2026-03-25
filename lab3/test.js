function handelsubmit(){
    let name = document.getElementById('name');
    let age = document.getElementById('age');
    let id = document.getElementById('id');
    let Department = document.getElementById('department');


    if(name===""||age===""||id===""||Departmet===""){
        alert("fill the box");
        return false;
    }
    alert(`The registration is complete \n name: ${name} \n id: ${id} \n age: ${age} \n Department: ${Department}`)
}
console.log("hello")