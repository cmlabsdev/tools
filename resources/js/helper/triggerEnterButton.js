function triggerEnter(button_id, inputId) {
    $(inputId).keyup((event)=>{
        if (event.keyCode === 13){
            $(button_id).click();
        }
    })
}
