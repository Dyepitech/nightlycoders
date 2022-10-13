import React from 'react';
import PageName from './PageName.jsx';

const PersonalDetails = ({ prevStep, nextStep, handleChange, values }) => {
    const Continue = e => {
        e.preventDefault();
        nextStep();
    }

    const Previous = e => {
        e.preventDefault();
        prevStep();
    }

    let button;
    let error;
    let isPro;
    if (values.lastname && values.firstname) {
        button = <div className="flex justify-center">
            <button className="flex mb-5 justify-center items-center py-2 px-3 text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" onClick={Continue}>Next</button>
        </div>
    }
    else {
        error = <div className="flex justify-center">
            <p className="mt-5 font-bold text-red-600">Les champs doivent être remplis</p>
        </div>
    }

    if(values.situation == 'Professionnel'){
        isPro =
        <div className="mb-5 mt-5">
            <label for="lastname" className="font-bold mb-1 text-gray-700 block">Nom de votre société</label>
            <input type="text"
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
                {error}
                <div className="flex justify-center">
                    <div className="mb-5 mt-5 mr-5">
                        <label for="firstname" className="font-bold mb-1 text-gray-700 block">Prénom</label>
                        <input type="text"
                            className="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                            placeholder="Entrez votre prénom..."
                            value={values.firstname}
                            onChange={handleChange('firstname')} />


                    </div>
                    <div className="mb-5 mt-5">
                        <label for="lastname" className="font-bold mb-1 text-gray-700 block">Nom</label>
                        <input type="text"
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
                            className="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                            placeholder="Entrez votre numero"
                            value={values.phone}
                            onChange={handleChange('phone')} />
                        <label for="situation" className="mt-5 font-bold mb-1 text-gray-700 block">Vous êtes</label>
                        <select onChange={handleChange('situation')}  className="form-select appearance-none
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
