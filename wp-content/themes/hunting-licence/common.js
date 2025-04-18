$(function () {
    $("#accordion dt").on("click", function () {
      $(this).next().slideToggle("fast");
      $(this).toggleClass("active");
    });
  });

// モーダル
document.addEventListener('DOMContentLoaded', () => {
  const elem = document.getElementById('modal-1');
  new Modal(elem);
});

/**
 * モーダルウィンドウ
 * @property {HTMLElement} modal モーダル要素
 * @property {NodeList} openers モーダルを開く要素
 * @property {NodeList} closers モーダルを閉じる要素
 */
function Modal(modal) {
  this.modal = modal;
  const id = this.modal.id;
  this.openers = document.querySelectorAll('[data-modal-open="' + id + '"]');
  this.closers = this.modal.querySelectorAll('[data-modal-close]');
  
  this.handleOpen();
  this.handleClose();
}

/**
 * 開くボタンのイベント登録
 */
Modal.prototype.handleOpen = function() {
  if (this.openers.length === 0) {
    return false;
  }

  this.openers.forEach(opener => {
    opener.addEventListener('click', this.open.bind(this));
  });
};

/**
 * 閉じるボタンのイベント登録
 */
Modal.prototype.handleClose = function() {
  if (this.closers.length === 0) {
    return false;
  }

  this.closers.forEach(closer => {
    closer.addEventListener('click', this.close.bind(this));
  });
};

/**
 * モーダルを開く
 */
Modal.prototype.open = function() {
  this.modal.classList.add('is-open');
};

/**
 * モーダルを閉じる
 */
Modal.prototype.close = function() {
  this.modal.classList.remove('is-open');
};

document.addEventListener("DOMContentLoaded", function () {
  document.getElementById("toggle-random").addEventListener("click", function () {
      let url = new URL(window.location.href);
      if (url.searchParams.get("random") === "1") {
          url.searchParams.delete("random"); // 通常順に戻す
      } else {
          url.searchParams.set("random", "1"); // ランダムにする
      }
      window.location.href = url.toString(); // ページをリロード
  });
});
