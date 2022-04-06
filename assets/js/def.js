function addInput() {
    var div = document.createElement("div");
    div.setAttribute('class', 'wrap-input100 validate-input bg1');
    var span = document.createElement("span");
    span.setAttribute('class', 'label-input100');
    span.innerHTML = 'Website Address';
    div.appendChild(span);

    var input = document.createElement("input");
    input.setAttribute('type', 'text');
    input.setAttribute('name', 'urls[]');
    input.setAttribute('class', 'input100');
    input.setAttribute('placeholder', 'Enter the address you want to index.');
    div.appendChild(input);

    var parent = document.getElementById("inputs");
    parent.appendChild(div);
}
