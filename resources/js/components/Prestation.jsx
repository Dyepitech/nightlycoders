import React from 'react'
import PageName from './PageName.jsx';

const Prestation = ({ prevStep, nextStep, handleChange, values , saveDevis}) => {
    const Continue = e => {
        e.preventDefault();
        nextStep();
    }

    const Previous = e => {
        e.preventDefault();
        prevStep();
    }

    const Save = async (e) => {
        e.preventDefault();
        saveDevis();
    }

    let pages;
    let buttons;

    if (values.prestation == 'Vitrine'){
        pages = 
        <div className="mb-5 mt-5">
            <label for="pages" className="font-bold mb-1 text-gray-700 block">Nombre de pages</label>
            <input type="number"
                name="pages"
                min='1'
                className="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                placeholder="Nombre de pages..."
                value={values.pages}
                onChange={handleChange('pages')} />
                
        </div>
    }

    if (values.prestation) {
        buttons = 
        <div className="">
            <div className="flex justify-center">
                <button className="mr-5 flex mb-5 justify-center items-center py-2 px-3 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" onClick={Previous}>Precedent</button>
                <button className="flex mb-5 justify-center items-center py-2 px-3 text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" onClick={Continue, Save}>Valider</button>
            </div>
        </div>
        
    }

    return (
        <div className="flex justify-center w-full">
            <form onSubmit={saveDevis} className="mt-5 bg-white p-10 rounded-md w-full" >
                <PageName name="Generateur de devis"></PageName>
                <div className="flex justify-center">
                    <div className="mb-5 mt-5 mr-5">
                        <label for="firstname" className="font-bold mb-1 text-gray-700 block">Prestation</label>
                        <select onChange={handleChange('prestation')}  name="prestation" className="form-select appearance-none
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
                            <option>Chosissez une option</option>
                            <option value="Vitrine">Site Vitrine</option>
                            <option value="Ecommerce" >Site E-Commerce</option>
                        </select>
                        {pages}
                    </div>
                </div>
                    {buttons}
            </form>
        </div>
    )
}

export default Prestation
