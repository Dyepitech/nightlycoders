import React from 'react';
import PageName from './PageName.jsx';

const PersonalDetails = ({ prevStep, nextStep, handleChange, values }) => {
    const Continue = e => {
        e.preventDefault();
        nexted = true;
        nextStep();
    }

    const Previous = e => {
        e.preventDefault();
        prevStep();
    }

    function telephoneCheck(str) {
        var isphone = /^(1\s|1|)?((\(\d{3}\))|\d{3})(\-|\s)?(\d{3})(\-|\s)?(\d{4})$/.test(str);
        return isphone;
    }

    function validateEmail(email) {
        var re = /\S+@\S+\.\S+/;
        return re.test(email);
    }

    //? VARIABLES
    let button;
    let errors = [];
    let isPro;
    var nexted = false
    let allfield = false;


    //? END OF VARIABLES

    //! ERROR GESTION

    if (values.firstname && values.lastname && values.phone && values.email)
        allfield = true;
    if (allfield == true && values.firstname.length > 0 && values.firstname.length < 3)
        errors.push('Le Champ prénom doit faire 3 caractères minimum\n')
    if (allfield == true && values.lastname.length > 0 && values.lastname.length < 3)
        errors.push('Le Champ nom doit faire 3 caractères minimum')
    if (allfield == true && values.phone.length > 0 && telephoneCheck(values.phone) != true)
        errors.push('Le Champ du téléphone est invalide')
    if (allfield == true && values.email.length > 0 && validateEmail(values.email) == false)
        errors.push('L\'email est invalide');
    if (allfield == true && values.situation == "Professionnel" && values.society.length < 3)
        errors.push('Le Champ du nom de votre société est invalide')

    if (errors.length == 0 && allfield == true) {
        button = <div className="flex justify-center">
            <button className="flex mb-5 justify-center items-center py-2 px-3 text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" onClick={Continue}>Next</button>
        </div>
    }


    //! END ERROR GESTION

    if (values.situation == 'Professionnel') {
        isPro =
            <div className="mb-5 mt-5">
                <label for="lastname" className="font-bold mb-1 text-gray-700 block">Nom de votre société</label>
                <input type="text"
                    name="society"
                    className="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                    placeholder="Nom de votre société..."
                    value={values.society}
                    onChange={handleChange('society')} />
            </div>
    }

    return (
        <div className="flex justify-center w-full">
            <form className="mt-5 bg-white p-10 rounded-md w-full" >
                <PageName name="Generateur de devis"></PageName>
                {nexted == true ? errors.map(error => (  
                <div className="flex justify-center">
                    <p className="mt-5 font-bold text-red-600">  
                        {error}
                    </p>
                </div>
                    )) : ''}
                <div className="flex justify-center">
                    <div className="mb-5 mt-5 mr-5">
                        <label for="firstname" className="font-bold mb-1 text-gray-700 block">Prénom</label>
                        <input type="text"
                            name="firstname"
                            className="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                            placeholder="Entrez votre prénom..."
                            value={values.firstname}
                            onChange={handleChange('firstname')} />
                    </div>
                    <div className="mb-5 mt-5">
                        <label for="lastname" className="font-bold mb-1 text-gray-700 block">Nom</label>
                        <input type="text"
                            name="lastname"
                            className="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                            placeholder="Entrez votre nom..."
                            value={values.lastname}
                            onChange={handleChange('lastname')} />
                    </div>
                </div>
                <div className="flex justify-center">
                    <div className="mb-5 mt-5 mr-5">
                        <label for="phone" className="font-bold mb-1 text-gray-700 block">Téléphone</label>
                        <input type="tel"
                            name="phone"
                            className="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                            placeholder="Entrez votre numero"
                            value={values.phone}
                            onChange={handleChange('phone')} />
                        <label for="situation" className="mt-5 font-bold mb-1 text-gray-700 block">Vous êtes</label>
                        <select name="situation" onChange={handleChange('situation')} className="form-select appearance-none
                        block
                        w-full
                        px-3
                        py-1.5
                        text-base
                        font-normal
                        text-gray-700
                        bg-white bg-clip-padding bg-no-repeat
                        border border-solid border-gray-300
                        rounded
                        transition
                        ease-in-out
                        m-0
                        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                            <option value="Particulier">Particulier</option>
                            <option value="Professionnel" >Professionnel</option>
                        </select>
                    </div>
                    <div className="mb-5 mt-5">
                        <label for="email" className="font-bold mb-1 text-gray-700 block">Email</label>
                        <input type="email"
                            name="email"
                            className="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                            placeholder="Entrez votre email..."
                            value={values.email}
                            onChange={handleChange('email')} />
                        {isPro}
                    </div>
                </div>
                {button}
            </form>
        </div>
    )
}

export default PersonalDetails
