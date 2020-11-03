<div id="tickets-close-popup" class="fixed h-screen w-screen bg-opacity-50 top-0 bg-black hidden">
    <div class="relative w-auto lg:w-1/2 z-50 bg-white my-12 mx-4 lg:mx-auto max-w-3xl rounded-lg border-solid border-2 border-gray">
        <div className='relative p-6 flex-auto'>
            <h3 class="text-center text-lg p-2"> Halte ! Assurez-vous que le ticket n'est pas encore posté </h3>
            <div class="card-body text-center">
                <?php for ($i = 0; $i < 4; $i++) { ?>
                    <div class="inline-block border-2 border-solid border-gray rounded-lg m-1 w-5/12">
                        <div class="px-2 text-xs"><b>Nature</b>: Sécurité routière</div>
                        <div class="px-2 text-xs"><b>Problème</b>: Route déformée</div>
                        <div>
                            <img src="https://picsum.photos/500" alt="" class="mx-auto my-2 w-32" />
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="text-center my-5">
            <button id="popup-skip-button" type="button" onclick="closePopup()" class="text-white py-2 px-4 rounded w-50 m-auto text-lg" style="background-color: #63c76a">
                Je continue
            </button>
            </div>
        </div>
    </div>
</div>

<script>
    function closePopup(){
        document.getElementById("tickets-close-popup").style.display = "none";
    }
</script>
