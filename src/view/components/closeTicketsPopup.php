<div id="tickets-close-popup" class="fixed h-screen w-screen bg-opacity-50 top-0 bg-black hidden">
    <div class="relative w-auto lg:w-1/2 z-50 bg-white my-12 mx-4 lg:mx-auto max-w-3xl rounded-lg border-solid border-2 border-gray">
        <div className='relative p-6 flex-auto'>
            <h3 class="text-center text-lg p-2"> Halte ! Assurez-vous que le ticket n'est pas encore posté </h3>
            <div id="noTickets">Aucun ticket dans les alentours!</div>
            <div class="row-cust overflow-y-scroll" id="tickets" style="height: 70vh">
                <!-- Généré par JS -->
            </div>
            <div class="text-center my-5">
            <button id="popup-skip-button" type="button" onclick="closePopup()" class="text-white py-2 px-4 rounded w-50 m-auto text-lg" style="background-color: #63c76a">
                Je continue
            </button>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>
    function closePopup(){
        document.getElementById("tickets-close-popup").style.display = "none";
    }
    jQuery(function ($){
        $(document).ready(function() {
            $('#fullImage').css('display', 'none');
            // Check if body height is higher than window height :)
            $(window).resize(function () {
                calculHeight();
            })
            calculHeight();
            refreshTickets();
        });
        function calculHeight() {
            if ($("body").height() > $(window).height()) {
                var heightFooter = $('#footer').height();
                heightFooter += 30;
                $('#spacer').css('margin-top', heightFooter+'px')
            } else {
                $('#spacer').css('margin-top', '0')
            }
        }
    });
    function openImage(url) {
        jQuery('#fullImageSrc').attr('src', url);
        jQuery('#fullImage').css('display', 'block');
    }
    function closeImage() {
        jQuery('#fullImage').css('display', 'none');
    }
    function refreshTickets() {
        var coordsTest = { long: -1.548970890971788, lat: 47.19398987251469 }; // A utiliser lors des tests
        window.navigator.geolocation.getCurrentPosition(successCallback, console.log);
        function successCallback(cb){
            var coordsUser = { long: cb.coords.longitude, lat: cb.coords.latitude };
            jQuery.ajax({
                type: "post",
                url: "../controller/getTicketsProximity.php",
                data: coordsUser,
                success: function(data) {
                    const elem = $("#tickets");
                    elem.empty();
                    data = JSON.parse(data);
                    console.log(data)
                    if (data.length === 0) {
                        console.log('test!');
                        jQuery('#noTickets').show();
                    }
                    for (var k in data) {
                        jQuery('#noTickets').hide();
                        const v = data[k];
                        var imgSrc = '';
                        if (v['nbImg'] > 2) {
                            v['nbImg'] = 2; // On veut afficher que deux images maximum
                        }
                        for(var i = 0; i < v['nbImg']; i++) {
                            var src = v['data'] + i + '.jpg';
                            imgSrc += `<img onclick="openImage('${src}')" src="${src}" alt="" class="object-cover" style="max-width: 150px;max-height: 150px;height: 150px;width: 150px; display: inline-block" />`;
                        }
                        var color_plus_one = 'black';
                        if (v['voted']) {
                            color_plus_one = '#27ae60';
                        }
                        elem.append(`<div class="`+data[k][4]+` ticket-close column hidden rounded-lg shadow-lg border-2 border-solid border-gray m-4">
                    <div class="rounded-lg shadow-lg">
                        <p class="font-semibold w-full text-center">${v['cat_sentence']}</p>
                        <p class="text-sm mx-2 text-center">${v['sub_sentence']}</p>
                        <div style="text-align: center;margin-top: 10px">
                            ${imgSrc}
                        </div>
                    </div>
                    <div style="width: 100%;height:1px;background: rgba(0,0,0,0.5)"></div>
                    <div style="padding: 10px">
                        <div style="float: right">
                            <form action="../model/homeModel.php" method="POST">
                                <input type="hidden" value="${v['id']}" name="ticketId" />
                                <button class="btn-vote" name="vote"><span class="material-icons" style="vertical-align: middle;color:${color_plus_one}">exposure_plus_1</span></button>
                            </form>
                        </div>
                        <div style="clear:both"></div>
                    </div>
                </div>`);
                    }
                }
            })
        }
    }
</script>
