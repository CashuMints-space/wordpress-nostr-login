document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('nostr-login-button').addEventListener('click', async () => {
        document.dispatchEvent(new CustomEvent('nlLaunch', { detail: 'welcome' }));
    });

    document.addEventListener('nlAuth', async (e) => {
        if (e.detail.type === 'login' || e.detail.type === 'signup') {
            const publicKey = await window.nostr.getPublicKey();
            const signedEvent = await window.nostr.signEvent({
                kind: 12345,
                created_at: Math.floor(Date.now() / 1000),
                tags: [],
                content: 'Login request'
            });

            // Send publicKey and signedEvent to your server for verification
            const response = await fetch(nostrLoginAjax.ajaxurl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    action: 'nostr_login',
                    publicKey: publicKey,
                    signedEvent: signedEvent
                })
            });

            const data = await response.json();
            if (data.success) {
                window.location.reload();
            } else {
                alert('Login failed');
            }
        }
    });
});
