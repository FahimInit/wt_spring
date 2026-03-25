<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=h1, initial-scale=1.0">
    <title>JavaScript</title>
</head>
<body>
    <form onSubmit = "return handelsubmit()">
        <p>name: </p>
        <input type="text" id="name">

        <p>age: </p>
        <input type="text" id="age">

        <p>id: </p>
        <input type="text" id="id">

        <p>Department: </p>
        <input type="text" id="department">

        <button type="submit">Submit</button>
    </form>

    <script>
        function handelsubmit(){
            let name = document.getElementById('name').value;
            let age = document.getElementById('age').value;
            let id = document.getElementById('id').value;
            let Department = document.getElementById('department').value;
            if(name===""||age===""||id===""||Department===""){
                alert("fill the box");
                return false;
            }
            alert(`The registration is complete \n name: ${name} \n id: ${id} \n age: ${age} \n Department: ${Department}`)
               return false;
            
        }
        console.log("hello")
    </script>
</body>
</html>