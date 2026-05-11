// public/assets/js/admin.js

(function() {
    const iframe = document.getElementById('editor-frame');
    let currentElement = null;

    // Attach context menu to current document
    document.addEventListener('contextmenu', (e) => {
        const target = e.target.closest('[msgid], [imgid], [vidid]');
        if (!target) return;
        e.preventDefault();
        e.stopPropagation();
        currentElement = target;
        showEditorPopup(target, e);
    });

    // Add Local Partner Listeners
    const addTrigger = document.getElementById('add-partner-trigger');
    const uploadInput = document.getElementById('partner-upload-input');
    if (addTrigger && uploadInput) {
        addTrigger.onclick = () => uploadInput.click();
        uploadInput.onchange = async () => {
            const fd = new FormData();
            fd.append('file', uploadInput.files[0]);
            const response = await fetch('/upload_partner.php', { method: 'POST', body: fd });
            if (response.ok) location.reload();
        };
    }
    
    document.querySelectorAll('.delete-partner-btn').forEach(btn => {
        btn.onclick = async (e) => {
            e.stopPropagation();
            if (!confirm('Are you sure?')) return;
            const filename = btn.getAttribute('data-filename');
            const response = await fetch('/delete_partner.php', {
                method: 'POST',
                body: JSON.stringify({ filename }),
                headers: { 'Content-Type': 'application/json' }
            });
            if (response.ok) location.reload();
        };
    });

    // Add Local Financial Listeners
    const addFinTrigger = document.getElementById('add-financial-trigger');
    const uploadFinInput = document.getElementById('financial-upload-input');
    if (addFinTrigger && uploadFinInput) {
        addFinTrigger.onclick = () => uploadFinInput.click();
        uploadFinInput.onchange = async () => {
            const fd = new FormData();
            fd.append('file', uploadFinInput.files[0]);
            const response = await fetch('/upload_financial.php', { method: 'POST', body: fd });
            if (response.ok) location.reload();
        };
    }
    
    document.querySelectorAll('.delete-financial-btn').forEach(btn => {
        btn.onclick = async (e) => {
            e.stopPropagation();
            if (!confirm('Are you sure?')) return;
            const filename = btn.getAttribute('data-filename');
            const response = await fetch('/delete_financial.php', {
                method: 'POST',
                body: JSON.stringify({ filename }),
                headers: { 'Content-Type': 'application/json' }
            });
            if (response.ok) location.reload();
        };
    });

    function showEditorPopup(el, mouseEvent) {
        removePopup();

        const msgid = el.getAttribute('msgid');
        const imgid = el.getAttribute('imgid');
        const vidid = el.getAttribute('vidid');

        const popup = document.createElement('div');
        popup.id = 'admin-editor-overlay';
        popup.style.cssText = `
            position: fixed; top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(0,0,0,0.5); backdrop-filter: blur(4px);
            z-index: 1000; display: flex; align-items: center; justify-content: center;
        `;

        const card = document.createElement('div');
        card.style.cssText = `
            background: #1e293b; color: #fff; padding: 2rem; border-radius: 1rem;
            width: 100%; max-width: 450px; border: 1px solid #334155;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        `;

        let contentHtml = '';
        if (msgid) {
            contentHtml = `
                <h3 style="margin-top:0;color:#f97316">Edit Text</h3>
                <p style="font-size:0.75rem;color:#94a3b8">MSGID: ${msgid}</p>
                <textarea id="popup-content" style="width:100%;height:120px;background:#0f172a;color:#fff;border:1px solid #334155;border-radius:0.5rem;padding:0.75rem;font-family:inherit;margin-bottom:1rem">${el.innerHTML}</textarea>
            `;
        } else if (imgid || vidid) {
            const type = imgid ? 'image' : 'video';
            contentHtml = `
                <h3 style="margin-top:0;color:#f97316">Update ${type.toUpperCase()}</h3>
                <p style="font-size:0.75rem;color:#94a3b8">MEDIA_ID: ${imgid || vidid}</p>
                <div style="margin-bottom:1rem">
                    <input type="file" id="popup-file" accept="${type}/*" style="width:100%;color:#94a3b8">
                </div>
                <div id="media-preview" style="margin-bottom:1rem;max-height:200px;overflow:hidden;border-radius:0.5rem;background:#000">
                    ${type === 'image' ? `<img src="${el.src}" style="width:100%">` : `<video src="${el.src}" style="width:100%"></video>`}
                </div>
            `;
        }

        card.innerHTML = contentHtml + `
            <div style="display:flex;gap:1rem">
                <button id="popup-save" style="flex:1;padding:0.75rem;background:#f97316;color:#fff;border:none;border-radius:0.5rem;font-weight:600;cursor:pointer">Save Changes</button>
                <button id="popup-cancel" style="flex:1;padding:0.75rem;background:#334155;color:#fff;border:none;border-radius:0.5rem;font-weight:600;cursor:pointer">Cancel</button>
            </div>
            <div id="popup-status" style="margin-top:1rem;font-size:0.875rem;display:none;text-align:center"></div>
        `;

        popup.appendChild(card);
        window.top.document.body.appendChild(popup);

        window.top.document.getElementById('popup-cancel').onclick = removePopup;
        window.top.document.getElementById('popup-save').onclick = () => handleSave(el, msgid, imgid || vidid);
    }

    function removePopup() {
        const p = window.top.document.getElementById('admin-editor-overlay');
        if (p) p.remove();
    }

    async function handleSave(el, msgid, mediaId) {
        const btn = window.top.document.getElementById('popup-save');
        const status = window.top.document.getElementById('popup-status');
        
        btn.disabled = true;
        btn.innerText = 'Saving...';
        status.style.display = 'block';
        status.style.color = '#94a3b8';
        status.innerText = 'Processing update...';

        try {
            const lang = new URLSearchParams(window.location.search).get('lang') || 'en';
            let response;

            if (msgid) {
                const content = window.top.document.getElementById('popup-content').value;
                const fd = new FormData();
                fd.append('msgid', msgid);
                fd.append('lang', lang);
                fd.append('content', content);

                response = await fetch('/update_text.php', { method: 'POST', body: fd });
                if (response.ok) {
                    // LIVE UPDATE TEXT IN IFRAME AS HTML
                    el.innerHTML = content;
                    showToast('Text updated successfully!');
                    removePopup();
                } else {
                    const resJson = await response.json();
                    throw new Error(resJson.error || 'Failed to save');
                }
            } else if (mediaId) {
                const fileInput = window.top.document.getElementById('popup-file');
                const file = fileInput.files[0];
                if (!file) {
                    throw new Error("Please select a file.");
                }

                const isVideo = !el.hasAttribute('imgid');
                const maxSize = isVideo ? 500 * 1024 * 1024 : 10 * 1024 * 1024;
                if (file.size > maxSize) {
                    throw new Error(`File is too large. Maximum size is ${isVideo ? '500MB' : '10MB'}.`);
                }

                const fd = new FormData();
                fd.append('media_id', mediaId);
                fd.append('type', isVideo ? 'video' : 'image');
                fd.append('file', file);

                response = await fetch('/update_media.php', { method: 'POST', body: fd });
                const result = await response.json();
                
                if (response.ok) {
                    // LIVE UPDATE MEDIA IN IFRAME
                    el.src = result.src;
                    if (el.tagName === 'VIDEO') {
                        el.load();
                        el.play().catch(e => console.log('Autoplay blocked'));
                    }
                    showToast('Media updated successfully!');
                    removePopup();
                } else {
                    throw new Error(result.error);
                }
            }
        } catch (err) {
            status.style.color = '#ef4444';
            status.innerText = 'Error: ' + err.message;
            btn.disabled = false;
            btn.innerText = 'Retry Save';
        }
    }

    function showToast(msg) {
        const toast = document.createElement('div');
        toast.style.cssText = `
            position: fixed; bottom: 2rem; right: 2rem; background: #10b981;
            color: #fff; padding: 1rem 2rem; border-radius: 0.5rem;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            z-index: 2000; animation: slideIn 0.3s forwards;
        `;
        toast.innerText = msg;
        document.body.appendChild(toast);

        setTimeout(() => {
            toast.style.animation = 'slideOut 0.3s forwards';
            setTimeout(() => toast.remove(), 300);
        }, 3000);
    }

    // Add toast animations to parent
    const style = document.createElement('style');
    style.textContent = `
        @keyframes slideIn { from { transform: translateY(100%); opacity: 0; } to { transform: translateY(0); opacity: 1; } }
        @keyframes slideOut { from { transform: translateY(0); opacity: 1; } to { transform: translateY(100%); opacity: 0; } }
    `;
    document.head.appendChild(style);

})();
