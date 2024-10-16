let addRow = document.getElementById("add-row");
addRow.addEventListener('click', function() {
    let table = document.getElementById('table').getElementsByTagName("tbody")[0]
    let newRow = table.insertRow(table.rows.length)
    let namaBukuCell = newRow.insertCell(0) 
    let aksiCell = newRow.insertCell(1)
    let namaBuku = document.getElementById("id_buku")
    
    namaBuku =  namaBuku.options[namaBuku.selectedIndex].text
    namaBukuCell.innerHTML = namaBuku
    aksiCell.innerHTML = "<button type='button' onclick='deleteRow(this)' class='btn btn-sm btn-danger'>Hapus</button>"
})

// const deleteRow = (button) => {
//     let row = button.parentNode.parentNode
//     row.parentNode.removeChild(row)
// }

function deleteRow(button) {
    let row = button.parentNode.parentNode;
    row.parentNode.removeChild(row);
}