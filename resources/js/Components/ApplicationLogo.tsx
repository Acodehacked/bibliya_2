import {HTMLAttributes, ImgHTMLAttributes, SVGAttributes} from 'react';

export default function ApplicationLogo(props: React.ImgHTMLAttributes<HTMLImageElement>) {
    return (
        <img  src={'/storage/bibliya_logo.png'}  alt={'Bibliya App Logo'} {...props} />
    );
}
