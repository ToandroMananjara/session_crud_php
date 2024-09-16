const tbody = document.querySelector(".tbody-table");
const search = document.getElementById("search");
const previewButton = document.getElementById("preview");
const nextButton = document.getElementById("next");
const tableTitles = document.querySelectorAll('table-title');




let start = 0; // initialisation de la pagination
let end = 10; // initialisation de la pagination

// Fonction de recherche dans le nom et le prenom
const searchElement = (inputSearch, datas) => {
  const searchTerm = inputSearch.value.toLowerCase();
  const filteredData = datas.filter((data) => {
    // Vous pouvez personnaliser cette condition en fonction de votre logique de filtrage
    return (
      data.nom.toLowerCase().includes(searchTerm) ||
      data.prenom.toLowerCase().includes(searchTerm)
    );
  });
  return filteredData;
};

// Fonction d'affichage de donnée dans le tableau
const display = (container, datas) => {
  datas.forEach((data, id) => {
    container.innerHTML += `
                <tr class="row-table">
                    <th scope="row">${data.id}</th>
                    <td>${data.nom}</td>
                    <td>${data.prenom}</td>
                    <td>${data.parcours}</td>
                    <td>${data.date_naissance}</td>
                    <td>${data.adresse}</td>
                    <td>${data.sexe}</td>

                    
                    <td class="text-center">
                        <a href="./edit.php?id=${data.id}" class="btn btn-success" style=""> <span><i class="fa fa-pencil" aria-hidden="true"></i>
                        </span>
                        </a>
                        <a href="./delete.php?id=${data.id}" class="btn btn-danger"><span><i class="fa fa-trash" aria-hidden="true"></i>
                        </span></a>
                    </td>
                </tr>
            `;
  });
};

// Fonction de pagination
const pagination = (container, datas, start, end) => {
  container.textContent = "";
  const newdatas = datas.slice(start, end);
  display(container, newdatas);
};

const tri = (datas) => {
  const filters = datas.filter((data) =>{
      return data.nom
  })
  
    return filters;
} 


fetch("../api/api.php")
  .then((response) => response.json())
  .then((datas) => {
    console.log("listes des données", datas);
    console.log("filtrer les datas", tri(datas));
    // Affichage de premier donnée donnée
    pagination(tbody, datas, start, end);

    /** Section logique de recherche  */
    search.addEventListener("input", (e) => {
      tbody.textContent = "";
      const searchDatas = searchElement(search, datas);
      searchDatas.length !== 0
        ? pagination(tbody, searchDatas, start, end)
        : (tbody.innerHTML = ` <tr class='text-center fs-4 text-danger'> <td colspan=9 class='text-danger'> ${search.value} non trouvé ! </td> </tr> `);
    });

    tableTitles.forEach(tableTitle=>{
      tableTitle()
    })
    // 
    nextButton.addEventListener("click", (e) => {
      if (end <= datas.length) {
        start = start + 10;
        end = end + 10;
        pagination(tbody, datas, start, end);
      }
    });

    //
    previewButton.addEventListener("click", (e) => {
        console.log("listes des données", datas);
      if (start !== 0) {
        start = start - 10;
        end = end - 10;
        pagination(tbody, datas, start, end);
      }
    });
  });
