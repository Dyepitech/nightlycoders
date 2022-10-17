import React from 'react';
import { useState, CSSProperties } from "react";

const Final = ({ prevStep, handleChange, values }) => {

    const Previous = e => {
        e.preventDefault();
        prevStep();
    }

    return (
        <div className="flex justify-center flex-col">
            <div className="flex justify-center flex-col mb-5">
            <div
        className="mb-11 flex w-full rounded-lg border-l-[6px] border-transparent bg-white px-7 py-8 shadow-md md:p-9"
      >
        <div
          className="mr-5 flex h-9 w-full max-w-[36px] items-center justify-center rounded-lg bg-[#34D399] bg-opacity-30"
        >
            
          <svg
            width="17"
            height="12"
            viewBox="0 0 17 12"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M16.281 0.813685L16.2688 0.798941L16.2555 0.785173C15.8893 0.406018 15.2974 0.404945 14.93 0.781955L6.27018 9.47967L2.09399 5.27433C1.7266 4.89706 1.13447 4.89804 0.76826 5.27729C0.41058 5.6477 0.41058 6.23243 0.76826 6.60284L0.768224 6.60287L0.773158 6.60784L5.18177 11.0472C5.47504 11.3494 5.87368 11.5 6.24551 11.5C6.64809 11.5 7.02039 11.3448 7.30901 11.0475L16.1938 2.12381C16.5881 1.75601 16.5842 1.18007 16.281 0.813685Z"
              fill="#34D399"
              stroke="#34D399"
            />
          </svg>
        </div>
        
        <div className="w-full">
          <h5 className="mb-3 text-lg font-semibold text-dark">
            Votre demande de devis à été validée
          </h5>
          <p className="mb-6 text-base leading-relaxed text-body-color">
            Veuillez patienter le temps que nous générons votre devis...
            
          </p>
        </div>
        
      </div>
            </div>
        </div>
    )
}

export default Final
