const xhr = new XMLHttpRequest();
const xmlHttp = new XMLHttpRequest();

// Dodatkowa funkcjonalność w postaci losowania lisków :>
xhr.open('GET', 'https://randomfox.ca/floof/?ref=apilist.fun');
xhr.send(null);
xhr.onreadystatechange = function(e){
    if(xhr.readyState == 4){
        if(xhr.status == 200){
            let data = JSON.parse(xhr.responseText);
            document.querySelector(".placeholder").innerHTML = `<img class="fox-image" src="${data.image}"/>`;
            document.querySelector(".placeholder").children[0].onload = (e) => { document.querySelector(".placeholder").children[0].classList.add('active')}
        }
    }
}

function getData(type){
    try{
        let url = `./cgi-bin/lab6.py?type=${type}`;
        xmlHttp.responseType = XMLDocument;
        xmlHttp.open('GET', url);
        xmlHttp.send(null);

        xmlHttp.onreadystatechange = (e) => {
            if(xmlHttp.readyState == 4){
                if(xmlHttp.status == 200){
                    response = xmlHttp.responseXML;
                    const data = response.documentElement;
                    const options = data.getElementsByTagName('option');
		    const parsedOptions = (Array.from(options).map(option => `<option>${option.firstChild.data}</option>`));
		    const elements = [`<option>Wybierz opcje</option>`, ...parsedOptions];
                    document.querySelector('.select__options').innerHTML = elements.join("\n");
                }
            }
        }
    }

    catch(err){
        alert("Wystąpił błąd! Połączenie z serwerem zostało przerwane.");
    }
    
}


function firstSet(){    
    const type = 'pierwszy';
    getData(type);

}

function secondSet(){
    const type = 'drugi';
    getData(type);
}
