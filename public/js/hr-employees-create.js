// create - employee


function previewImage(input){
    const preview = document.getElementById('preview');
    const file = input.files[0];
    if(file){
        const reader = new FileReader();
        reader.onload = e=>{
            preview.src = e.target.result;
            preview.style.display='block';
        };
        reader.readAsDataURL(file);
    }
}

document.getElementById('birthdate').addEventListener('change',function(){
    const birthdate = new Date(this.value);
    const today = new Date();
    let age = today.getFullYear() - birthdate.getFullYear();
    const m = today.getMonth() - birthdate.getMonth();
    if(m<0||(m===0 && today.getDate()<birthdate.getDate())) age--;
    if(age<18){
        alert('Employee must be 18 years or older.');
        this.value = '';
        document.getElementById('age').value = '';
    } else {
        document.getElementById('age').value = age;
    }
});

// Optional: Prevent letters in number fields
document.querySelectorAll('input[pattern="\\d*"]').forEach(input=>{
    input.addEventListener('input',()=>{ input.value = input.value.replace(/\D/g,''); });
});

function previewImage(input){
    const preview = document.getElementById('preview');
    const file = input.files[0];
    if(file){
        const reader = new FileReader();
        reader.onload = e => {
            preview.src = e.target.result; // replace with selected image
        };
        reader.readAsDataURL(file);
    }
}

document.querySelector('select[name=department]').addEventListener('change', function(){
    if(this.value === '__other'){
        var modal = new bootstrap.Modal(document.getElementById('otherDepartmentModal'));
        modal.show();
    }
});

document.getElementById('saveOtherDeptBtn').addEventListener('click', function(){
    var input = document.getElementById('otherDepartmentInput').value.trim();
    if(input){
        // add new option and select it
        var select = document.querySelector('select[name=department]');
        var option = new Option(input, input, true, true);
        select.add(option);
        var modalEl = document.getElementById('otherDepartmentModal');
        var modal = bootstrap.Modal.getInstance(modalEl);
        modal.hide();
    }
});


// DONE CHECKING
