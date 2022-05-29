let edit_profile = getElm("edit_profile");
let cancel_profile = getElm("cancel_profile");
let save_profile = getElm("save_profile");
let info = getAllElm("info");
let list_edit = getElm("list_edit");
let form = getElm("form");
let formURL = form.action;
let profile_iamge = getElm("profile_iamge");
let profile_image_input = getElm("profile_image_input");
let all_input_profile = getAllElm("input_profile");
let update_profile_image = getElm("update_profile_image");
let cancel_profile_image = getElm("cancel_profile_image");
edit_profile.addEventListener("click",()=>
{
    hideAll(info)
    showAll(all_input_profile)
    hide(edit_profile)
    show(list_edit)
})
cancel_profile.addEventListener("click",()=>
{
    showAll(info)
    hideAll(all_input_profile)
    show(edit_profile)
    hide(list_edit)
})



save_profile.addEventListener("click",()=>
{
    let formdata = new FormData(form);
    fetch(formURL ,
    {
        method: "post" ,
        body  : formdata
    })
    .then(resp=>resp.json())
    .then(data=>{
        removeErrors()
        if(data.errors)
        {
            for(error in data.errors)
            {
                let input_has_error = getElm(`error_${error}`);
                input_has_error.classList.add("is-invalid");
                let error_msg = data.errors[error];
                let error_div = "<div class='invalid-feedback'>"+error_msg[0]+"</div>";
                input_has_error.insertAdjacentHTML("afterend" , error_div)
            }
        }else
        {
            console.log("re")
            window.location.reload();
        }
    })
})




profile_iamge.addEventListener("click",()=>
{
    profile_image_input.click();
})




singleUpload(profile_image_input , ALLOWD_TYPE_IMAGE , ALLOWD_SIZE ,showImagePorfile);
let oldsrc = profile_iamge.getAttribute("src");
function showImagePorfile(file , imagesrc)
{
    if(!file.type.includes(ALLOWD_TYPE_IMAGE))
    {
        profile_iamge.src = oldsrc;
        showImageErr()

    }else
    {
        removeErrors()
          profile_iamge.src =  imagesrc;  
    }
 
    show(update_profile_image);
    show(cancel_profile_image);
    cancel_profile_image.addEventListener("click",()=>
    {
        hide(update_profile_image);
        hide(cancel_profile_image);
        profile_iamge.src = oldsrc;
        removeErrors()
    })
    update_profile_image.addEventListener("click",()=>
    {
        let file_form = getElm("file_form");
        let file_form_url = file_form.action;
        fetchUpdateImage(file_form , file_form_url)
    })
}

function fetchUpdateImage(form,url)
{
    let formdata = new FormData(form);
    fetch(url ,
    {
        method: "post" ,
        body  : formdata
    })
    .then(resp=>resp.json())
    .then(data=>{
        removeErrors()
        if(data.errors)
        {
            for(error in data.errors)
            {
                let input_has_error = getElm(`error_${error}`);
                input_has_error.classList.add("is-invalid");
                let error_msg = data.errors[error];
                let error_div = "<div class='invalid-feedback'>"+error_msg[0]+"</div>";
                input_has_error.insertAdjacentHTML("afterend" , error_div)
            }
        }else
        {
            hide(update_profile_image);
            hide(cancel_profile_image);
            let input_has_error = getElm(`error_image`);
            input_has_error.classList.add("valid");
            let valid_div = "<div class='valid-feedback' style='display:block'> profile is updated succefully</div>";
            input_has_error.insertAdjacentHTML("afterend" , valid_div)
        }
    
    })
}


function showImageErr()
{
    let input_has_error = getElm(`error_image`);
    input_has_error.classList.add("is-invalid");
    let error_div = `<div class='invalid-feedback' style="display:block;">sorry you suoud select only images </div>`;
    input_has_error.insertAdjacentHTML("beforeend" , error_div)
}
function removeErrors()
{
    let invalidDivs = getAllElm('invalid-feedback');
    if(invalidDivs)
    {
        invalidDivs.forEach(element => {
            element.remove()
        });
    }

    let divHasisinvalid = getAllElm('is-invalid');
    if(divHasisinvalid)
    {
        divHasisinvalid.forEach(element => {
            element.classList.remove("is-invalid");
        });
    }
}