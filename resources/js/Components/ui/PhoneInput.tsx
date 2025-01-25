import CountryCodes from '@/../../../../../Bibliya/resources/js/Constants/CountryCodes'
type CountryCode = {
  name: string,
  dial_code: string,
  code: string
}
export default function PhoneInput({value,SetValue}:{value:{
    phone:number,
    code:string
  },SetValue:(value: (((prevState: {
    phone:number,
    code:string
  }) => {
    phone:number,
    code:string
  }) | {
    phone:number,
    code:string
  })) => void}){
  return <div>

  </div>
}
