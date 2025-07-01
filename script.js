document.addEventListener("DOMContentLoaded", function () {
    if (sessionStorage.getItem("adblock-popup-shown")) return;

    const bait = document.createElement('div');
    bait.className = 'adsbox ad adsbygoogle';
    bait.style = 'width: 1px; height: 1px; position: absolute; left: -999px;';
    document.body.appendChild(bait);

    setTimeout(() => {
        const adBlocked = bait.offsetHeight === 0;
        bait.remove();

        if (adBlocked) {
            sessionStorage.setItem("adblock-popup-shown", "true");
            showAdblockPopup();
        }
    }, 100);

    function showAdblockPopup() {
        const overlay = document.createElement('div');
        overlay.id = 'adblock-overlay';

        overlay.innerHTML = `
            <div id="adblock-popup">
                <h2>${adblockDetectorData.title}</h2>
                <p>${adblockDetectorData.message}</p>
                <button id="recheck-adblock">${adblockDetectorData.button}</button>
            </div>
        `;

        document.body.appendChild(overlay);
        overlay.style.display = 'flex';

        document.getElementById("recheck-adblock").addEventListener("click", () => {
            const baitRetry = document.createElement('div');
            baitRetry.className = 'adsbox ad adsbygoogle';
            baitRetry.style = 'width: 1px; height: 1px; position: absolute; left: -999px;';
            document.body.appendChild(baitRetry);

            setTimeout(() => {
                const stillBlocked = baitRetry.offsetHeight === 0;
                baitRetry.remove();

                if (!stillBlocked) {
                    document.getElementById("adblock-overlay").remove();
                } else {
                    alert("AdBlock is still active. Please disable it and try again.");
                }
            }, 100);
        });
    }
});
