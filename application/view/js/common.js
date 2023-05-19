function chkDuplication() {
    const id = document.getElementById('id');
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
        } else if (apiData['flg'] === '2') {
            idSpan.innerHTML = apiData["msg"];
        }
        else {
            idSpan.innerHTML = apiData["msg"];
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