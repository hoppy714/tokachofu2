let imgToggler = () => {
    const crowd = document.getElementById('crowd');
    document.getElementById('crowdImg1').addEventListener('mouseover', () => {
        crowd.classList.add('img2');
    })
    document.getElementById('crowdImg1').addEventListener('mouseleave', () => {
        crowd.classList.remove('img2');
    })

    document.getElementById('crowdImg2').addEventListener('mouseover', () => {
        crowd.classList.add('img3');
    })
    document.getElementById('crowdImg2').addEventListener('mouseleave', () => {
        crowd.classList.remove('img3');
    })

    document.getElementById('crowdImg3').addEventListener('mouseover', () => {
        crowd.classList.add('img4');
    })
    document.getElementById('crowdImg3').addEventListener('mouseleave', () => {
        crowd.classList.remove('img4');
    })
}

imgToggler()