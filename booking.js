function message(){
    var Name = document.getElementById('name');
    var email = document.getElementById('email');
    // var msg = document.getElementById('msg');
    var Ser = document.getElementById('Service');
    var location = document.getElementById('location');
    var date = document.getElementById('date');
    var number = document.getElementById('number');
    const success = document.getElementById('success');
    const danger = document.getElementById('danger');

    if(Name.value === '' || email.value === '' || Ser.value === ''|| location.value === ''|| date.value === ''|| number.value === ''){
        danger.style.display = 'block';
    }
    else{
        setTimeout(() => {
            Name.value = '';
            email.value = '';
            // msg.value = '';
            Ser.value='';
            location.value='';
            date.value='';
            number.value='';
        }, 2000);

        success.style.display = 'block';
    }

    setTimeout(() => {
        danger.style.display = 'none';
        success.style.display = 'none';
    }, 4000);

}