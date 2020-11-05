<div id="report-popup" class="fixed h-screen w-screen bg-opacity-50 top-0 bg-black hidden z-40">
    <div class="relative w-auto lg:w-1/2 z-50 bg-white my-12 mx-4 lg:mx-auto max-w-3xl rounded-lg border-solid border-2 border-gray z-50">
        <div className='relative p-6 flex-auto'>
            <h3 class="text-center text-lg p-2"> Signalement </h3>
            <form id="report-form" name="report-form" action="" method="post" enctype="multipart/form-data" class="text-center">
                <select name="report" id="report" class="form-control lg:w-1/3 border-solid border-2 border-gray rounded-lg p-1" required>
                    <option value='missing'> Disparu </option>
                    <option value='abusive'> Abus </option>
                    <option value='incorrect'> Informations incorrectes </option>
                </select>
                <input type="text" id="idTicket" name="idTicket" class="hidden">
                <div class="text-center my-5">
                    <button id="popup-skip-button" type="submit" class="text-white py-2 px-4 rounded w-50 m-auto text-lg" style="background-color: #63c76a">
                        Je continue
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function openPopup(idTicket) {
        document.getElementById("report-popup").style.display = "block"; // Open popup
        document.getElementById("idTicket").value = idTicket;
    }
</script>
