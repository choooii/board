function joinformCheck() {
    // 유효성 확인
    const id = document.getElementById('id');
    const pw = document.getElementById('pw');
    const pwChk = document.getElementById('pwChk');
    const name = document.getElementById('name');
    
    if(id.value === "") {
        id.focus();
        return false
    }

    if(pw.value === "") {
        pw.focus();
        return false
    }

    if(pwChk.value === "") {
        pwChk.focus();
        return false
    }

    if(name.value === "") {
        name.focus();
        return false
    }

    // 유효성 체크
    if(!idEngNumCheck(id.value)) {
        alert("ID는 영어 소문자와 숫자를 입력해주세요.");
        id.focus();
        return false
    }

    if(!idLengthCheck(id.value)) {
        alert("ID는 4~12자로 입력해주세요.");
        id.focus();
        return false
    }

    if(!passwordEngCheck(pw.value)) {
        alert("비밀번호는 영어 소문자를 포함해주세요.");
        pw.focus();
        return false;
    }

    if(!passwordNumSpcCheck(pw.value)) {
        alert("비밀번호는 숫자와 특수문자를 포함해 주세요.");
        pw.focus();
        return false;
    }

    if(!passwordLengthCheck(pw.value)) {
    alert("PW는 8~20자로 입력해주세요.");
        pw.focus();
        return false;
    }

    if(pw.value !== pwChk.value) {
        alert("비밀번호와 비밀번호 확인이 일치하지 않습니다.");
        pwChk.focus();
        return false;
    }

    if(!nameCheck(name.value)) {
        alert("이름은 한글, 영어, 숫자만 입력해주세요.");
        name.focus();
        return false;
    }

    if(!nameLengthCheck(name.value)) {
        alert("이름은 3~30자로 입력해주세요.");
        name.focus();
        return false;
    }

    //입력 값 전송
    document.registrationForm.submit();
}

// 유효성 확인 관련 함수
function chkPwVal() {
    const val = document.querySelector('#pw').value;
    const span1 = document.getElementById('pwChkSpan1');
    const span2 = document.getElementById('pwChkSpan2');
    const span3 = document.getElementById('pwChkSpan3');

    if(passwordEngCheck(val)) {
        span1.classList.add('pwChkSpanColor');
    } else {
        span1.classList.remove('pwChkSpanColor');
    }

    if(passwordNumSpcCheck(val)) {
        span2.classList.add('pwChkSpanColor');
    } else {
        span2.classList.remove('pwChkSpanColor');
    }

    if(passwordLengthCheck(val)) {
        span3.classList.add('pwChkSpanColor');
    } else {
        span3.classList.remove('pwChkSpanColor');
    }
}

function chkPwDupl() {
    const chkPwMsg = document.getElementById('chk_pw_msg');
    const p1 = document.getElementById('pw').value;
    const p2 = document.getElementById('pwChk').value;
    if( p2 === '' ) {
        chkPwMsg.innerHTML = '';
    } else if(p1 !== p2) {
        chkPwMsg.style.color = 'red';
        chkPwMsg.innerHTML = '비밀번호가 일치하지 않습니다.';
    } else {
        chkPwMsg.style.color = 'rgb(65, 194, 123)';
        chkPwMsg.innerHTML = '비밀번호가 일치합니다.';
    }
}


// 정규식 관련 함수
function passwordEngCheck(password) {
    let reg = /(?=.*?[a-z])/;
    return reg.test(password);
}

function passwordNumSpcCheck(password) {
    let reg = /(?=.*?[0-9])(?=.*?[#?!@$%^&*])/;
    return reg.test(password);
}

function passwordLengthCheck(password) {
    let reg = /^.{8,20}$/;
    return reg.test(password);
}

function idEngNumCheck(id) {
    let reg = /(?=.*?[a-z])(?=.*?[0-9])/;
    return reg.test(id);
}

function idLengthCheck(id) {
    let reg = /(?=.*?[a-z])(?=.*?[0-9])/;
    return reg.test(id);
}

function nameCheck(name) {
    let reg = /[^가-힣A-Za-z\d]/u;
    return !reg.test(name);
}

function nameLengthCheck(name) {
    let reg = /^.{3,30}$/;
    return reg.test(name);
}