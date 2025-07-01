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
                <h2>Ad Blocker Detected</h2>
                <p>Please disable your ad blocker to view the full content. We rely on ads to keep this site free.</p>
                <button id="recheck-adblock">I’ve Disabled AdBlock</button>
            </div>
        `;

        document.body.appendChild(overlay);
        overlay.style.display = 'flex';

        document.getElementById("recheck-adblock").addEventListener("click", () => {
            const recheckBait = document.createElement('div');
            recheckBait.className = 'adsbox ad adsbygoogle';
            recheckBait.style = 'width: 1px; height: 1px; position: absolute; left: -999px;';
            document.body.appendChild(recheckBait);

            setTimeout(() => {
                const stillBlocked = recheckBait.offsetHeight === 0;
                recheckBait.remove();

                if (!stillBlocked) {
                    document.getElementById("adblock-overlay").remove();
                } else {
                    alert("AdBlock is still active. Please disable it and try again.");
                }
            }, 100);
        });
    }
});
