function chkDuplication() {
    const id = document.getElementById("id");
    const url = "/api/user?id=" + id.value;

    // API
    fetch(url)
    .then(data => {
        if(data.status !== 200){
            throw new Error(data.status + ' : API Response Error')
        }
        return data.json();
    })
    .then(apiData => {
        const idSpan = document.getElementById('errMsgId');
        if (apiData['flg'] === '1') {
            idSpan.innerHTML = apiData["msg"];
        } else {
            idSpan.innerHTML = '중복되지 않은 ID입니다.';
        }
    })
    .catch(error => alert(error.message));
}

// 회원정보 페이지 정보 수정 버튼(비밀번호 확인)
function getPwChkBtn() {
    const userInfoForm = document.getElementById('userInfoForm');
    const pwChkInput = document.createElement('input');
    const pwChkBtn = document.createElement('button');

    // 인풋/버튼 내용/속성 넣기
    pwChkBtn.innerHTML = "비밀번호 확인";
    pwChkBtn.setAttribute('class', 'btn btn-dark btn-sm');
    pwChkBtn.setAttribute('type', 'submit');
    pwChkInput.setAttribute('type', 'text');
    pwChkInput.setAttribute('id', 'pw');
    pwChkInput.setAttribute('name', 'pw');

    // 폼 넣기
    if(document.querySelector('#pw') === null) {
        userInfoForm.appendChild(pwChkInput);
        userInfoForm.appendChild(pwChkBtn);
    }
}




// 유효성 확인 문구
const chkPwMsg = document.getElementById('chk_pw_msg');

function chkPassword() {
    const p1 = document.getElementById('pw').value;
    const p2 = document.getElementById('pwChk').value;
    if( p1 !== p2 ) {
        chkPwMsg.style.color = 'red';
        chkPwMsg.innerHTML = '비밀번호가 일치하지 않습니다.';
    } else {
        chkPwMsg.style.color = 'green';
        chkPwMsg.innerHTML = '비밀번호가 일치합니다.';
    }
}