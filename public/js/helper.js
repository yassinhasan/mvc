const ALLOWD_TYPE_IMAGE = "image/";
const ALLOWD_SIZE = 2
// file upload function 
function multiUpload(fileInput , type , size , callable = null)
{
    fileInput.addEventListener("change",(e)=>
        {
            let images = e.target.files;
            for(let i = 0 ; i < images.length ; i ++)
            {
                if(!images[i].type.includes(type))
                {
                    alert("sorry you must select images");
                    return
                }
            
                if((images[i].size  /  1048576 ) > size  )
                {
                    alert("sorry select image less than "+size);
                    return
                }
            
                let reader = new FileReader();
            
                reader.addEventListener("load",()=>
                {
                   let src = reader.resultl
                   callable(src)
                })
            
                reader.readAsDataURL(images[i]);
            }
        })
}

// single upload function 
function singleUpload(fileInput , type , size , callable = null)
{
    fileInput.addEventListener("change",(e)=>
    {
        let file = e.target.files[0];
        if(file)
        {
            // if(!file.type.includes(type))
            // {
                
            //     return
            // }

            // if((file.size  /  1048576 ) > size  )
            // {
            //     alert("sorry select image less than " + size+"MG") ;
            //     return
            // }

            let reader = new FileReader();
        
            reader.addEventListener("load",()=>
            {
                let src = reader.result;
                callable(file , src)
            })

            reader.readAsDataURL(file);            
        }

    })
}


// get element by classname 
function getElm(elm)
{
    return document.querySelector(`.${elm}`);
}
// get elements by classname 
function getAllElm(elms)
{
    return document.querySelectorAll(`.${elms}`);
}

// hide elments  

function hideAll(elms)
{
    if(elms)
    {
        elms.forEach(element => {
            element.style.display = "none"
        });
    }
}
function showAll(elms)
{
    if(elms)
    {

        elms.forEach(element => {
            if(element.classList.contains("hide"))
            {
                element.classList.remove("hide")
            }else
            {
                element.style.display = "block"
            }
        });
    }
}
function hide(elm)
{
    if(elm)
    {
        elm.style.display = "none"
    }
}
function show(elm)
{

    if(elm.classList.contains("hide"))
    {
        elm.classList.remove("hide")
    }else
    {
        elm.style.display = "block"
    }
}


function showLoadSpinner()
{
    let elm =  
    `
    <div class="overlay_spinner"></div>
    <div class="load_spinner">
    
        <div class="spinner-grow text-primary" role="status">
        <span class="visually-hidden">Loading...</span>
        </div>
        <div class="spinner-grow text-secondary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        <div class="spinner-grow text-success" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        <div class="spinner-grow text-danger" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        <div class="spinner-grow text-warning" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        <div class="spinner-grow text-info" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        <div class="spinner-grow text-dark" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
  </div>`;

  document.body.insertAdjacentHTML("beforeend" , elm)
}


function removeLoadSpinner()
{
    document.querySelector(".load_spinner").remove();
    document.querySelector(".overlay_spinner").remove();
}