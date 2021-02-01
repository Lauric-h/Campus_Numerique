function calculMonnaie(montantPaye, prixObjet) {
    // edge case not enough money
    if (montantPaye < prixObjet) {
        console.log("Vous n'avez pas donné assez !")
    }

    let renduMonnaie = montantPaye - prixObjet;

    if (renduMonnaie === 0) {
        console.log('Le compte est bon !')
    }

    let deuxEuros = 0;
    let unEuro = 0;
    let cinquanteCent = 0;
    let vingtCent = 0;
    let dixCent = 0;
    let cinqCent = 0;
    let deuxCent = 0;
    let unCent = 0;
    
    while (renduMonnaie >= 2) {
        renduMonnaie -= 2;
        deuxEuros++;
    }
    while (renduMonnaie >= 1) {
        renduMonnaie -= 1;
        unEuro++;
    }
    while (renduMonnaie >= 0.5) {
        renduMonnaie -= 0.5;
        cinquanteCent++;
    }
    while (renduMonnaie >= 0.2) {
        renduMonnaie -= 0.2;
        vingtCent++;
    }
    while (renduMonnaie >= 0.1) {
        renduMonnaie -= 0.1;
        dixCent++;
    }
    while (renduMonnaie >= 0.05) {
        renduMonnaie -= 0.05;
        cinqCent++;
    }
    while (renduMonnaie >= 0.02) {
        renduMonnaie -= 0.02;
        deuxCent++;
    }
    while (renduMonnaie >= 0.01) {
        renduMonnaie -= 0.01;
        unCent++;
    }


    console.log(`Rend ${deuxEuros} pièce de 2€, ${unEuro} pièce de 1€, ${cinquanteCent} pièces de 0.5€, ${vingtCent} pièce de 0.2€, ${dixCent} pièce de 0.1€, ${cinqCent} pièce de 0.05€, ${deuxCent} pièces de 0.02, ${unCent} pièce de 0.01€`);

}

calculMonnaie(10, 6.97);