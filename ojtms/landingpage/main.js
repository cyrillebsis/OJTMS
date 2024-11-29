document.addEventListener("DOMContentLoaded", () => {
    const modal = document.getElementById("modal");
    const modalBody = document.getElementById("modal-body");
    const openModalButton = document.getElementById("open-modal-button");
    const closeModalButton = document.getElementById("close-modal-button");
  
    const loadForm = async () => {
      try {
        const response = await fetch("create-account-form.php");
        if (!response.ok) {
          throw new Error("Failed to load form");
        }
        const formContent = await response.text();
        modalBody.innerHTML = formContent;
      } catch (error) {
        modalBody.innerHTML = `<p>Error loading form: ${error.message}</p>`;
      }
    };
  
   
    openModalButton.addEventListener("click", async () => {
      await loadForm();
      modal.classList.add("active");
    });
  
    
    closeModalButton.addEventListener("click", () => {
      modal.classList.remove("active");
    });
  
    
    window.addEventListener("click", (event) => {
      if (event.target === modal) {
        modal.classList.remove("active");
      }
    });
  });
  